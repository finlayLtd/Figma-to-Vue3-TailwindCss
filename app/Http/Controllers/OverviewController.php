<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use DOMDocument;
use DOMXPath;
use DateTime;
use sburina\Whmcs;
use App\Virtualizor\Admin;

class OverviewController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->virtualizorAdmin = new Admin();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $order_info = [];
        $oslists = [];
        $order_id  = $request->order_id;
        
        $order_info = $this->getOrderinfo($order_id);
        $today = new DateTime(date("Y-m-d"));
        $start_day = new DateTime($order_info['regdate']);
        $interval = $today->diff($start_day);
        $dayDiff = $interval->days;
        
        $product_info = $this->getProductInfo($order_info);
        $detail_info = $this->getProductDetailInfo($product_info);
        $other_info = $this->getOtherinfo($order_info);
        // $invoiceInfo = $this->getinvoiceInfo($order_id);
        // $this->serverMonitering($other_info['vps_info']['vpsid']);
        // print_r($other_info);exit;

        $vpsid = $other_info['vps_info']['vpsid'];
        $flag = $other_info['flag'];
        $sys_logo = $other_info['sys_logo'];
        $system = $other_info['system'];
        
        if($order_info['status'] == 'Active'){
            $network_speed = $this->getNetworkSpeed($vpsid);
            $vps_info = $this->getVpsStatistics($vpsid);
            $OSlist = $this->getOSlist($vpsid);
            $cpu = $this->getCpuStatistics($vpsid);
        }


        foreach($OSlist['oslist']['proxk'] as $key=>$os_group){
            foreach($os_group as $os_id=>$os){
                $os['group_name'] = $key;
                if(!isset($os['osid'])) $os['osid'] = $os_id;
                array_push($oslists,$os);
            }
        }
        return view('pages/overview', compact('order_id','order_info','dayDiff','detail_info','flag','sys_logo','system','vpsid','vps_info','oslists','cpu','network_speed'));
    }

    private function getOrderinfo($order_id)
    {
        $orders_response = (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetClientsProducts',
            'clientid' => Auth::user()->client_id,
        ]);
        $orders = $orders_response['products']['product'];
        foreach($orders as $order)
            if($order['orderid'] == $order_id) $order_info = $order;
        
        return $order_info;
    }

    private function getProductInfo($order_info)
    {
        $product_response = (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetProducts',
            'pid' => $order_info['pid'],
        ]);
        $product_info = $product_response['products']['product'][0];

        return $product_info;
    }

    private function getProductDetailInfo($product_info)
    {
        $detail_info = array();
        $doc = new DOMDocument();
        $doc->loadHTML($product_info['description']);
        $xpath = new DOMXPath($doc);

        $items = $xpath->query('//ul[@class="list-unstyled pricing-feature-list"]/li');

        foreach ($items as $item) {
            $span = $item->getElementsByTagName('span')->item(0);
            $span_value = $span->nodeValue;
            $value = trim($item->firstChild->nextSibling->nodeValue);

            array_push($detail_info,$span_value." ".$value);
        }

        return $detail_info;
    }

    private function getOtherinfo($order_info)
    {
        if(strpos($order_info['groupname'],'Netherlands') !== false){
            $info['flag'] = 'flag-nl';
        }else{
            $info['flag'] = 'flag-en';
        }

        if($order_info['status'] == 'Active'){
            $page = 0;
            $reslen = 0;
            //For Searching
            $post = array();
            $post['vpsid'] = $order_info['customfields']['customfield'][1]['value'];
            $vps_info = $this->virtualizorAdmin->listvs($page ,$reslen ,$post);
            $vps_info = $vps_info[$post['vpsid']];
            $info['vps_info'] = $vps_info;
            $system_label = explode('-',$vps_info['os_name'])[0];
            $info['system'] = $vps_info['os_name'];

        }else{
            $system_label = explode('-',$order_info['configoptions']['configoption'][1]['value'])[0];
            $info['system'] = $order_info['configoptions']['configoption'][1]['value'];
        }

        switch($system_label){
            case 'windows':
                $info['sys_logo'] = 'windows'; break;
            case 'ubuntu':
                $info['sys_logo'] = 'ubuntu'; break;
            case 'centos':
                $info['sys_logo'] = 'centos'; break;
            case 'debian':
                $info['sys_logo'] = 'debian'; break;
            case 'almalinux':
                $info['sys_logo'] = 'almalinux'; break;
            case 'fedora':
                $info['sys_logo'] = 'fedora'; break;
            case 'rocky':
                $info['sys_logo'] = 'rocky'; break;
        }

        return $info;
    }

    private function getVpsStatistics($vpsid)
    {
        $post = array();
        $post['vpsid'] = $vpsid; //Set this only when you want vps_data
        $post['show'] = date("Ym"); //Set this only when you want vps_data
        $vps_info = $this->virtualizorAdmin->vps_stats($post);
        return $vps_info;
    }

    private function getCpuStatistics($vpsid)
    {
        $vps_info = $this->virtualizorAdmin->cpu($vpsid);
        return $vps_info;
    }

    private function getOSlist()
    {
        $oslist = $this->virtualizorAdmin->ostemplates();
        return $oslist;
    }

    private function getNetworkSpeed($vpsid)
    {
        $vps_info = $this->virtualizorAdmin->listvs(1,50,array('vpsid'=>$vpsid));
        $network_speed = $vps_info[$vpsid]['network_speed'];
        return $network_speed;
    }

    public function turnon(Request $request)
    {
        $vpsid = $request->vpsid;
        $output = $this->virtualizorAdmin->start($vpsid);
        if($output['done_msg'] == 'VPS has been started successfully'){
            return response()->json($output['done_msg'], 200);
        }else{
            $error = "Please try again!";
            return response()->json($error, 500);
        }
    }
    
    public function turnoff(Request $request)
    {
        $vpsid = $request->vpsid;
        $output = $this->virtualizorAdmin->stop($vpsid);
        if($output['done_msg'] == 'Shutdown signal has been sent to the VPS'){
            return response()->json($output['done_msg'], 200);
        }else{
            $error = "Please try again!";
            return response()->json($error, 500);
        }
    }

    public function poweroff(Request $request)
    {
        $vpsid = $request->vpsid;
        $output = $this->virtualizorAdmin->poweroff($vpsid);
        if($output['done_msg'] == 'VPS has been powered off successfully'){
            return response()->json($output['done_msg'], 200);
        }else{
            $error = "Please try again!";
            return response()->json($error, 500);
        }
    }

    public function reboot(Request $request)
    {
        $vpsid = $request->vpsid;
        $output = $this->virtualizorAdmin->restart($vpsid);
        if($output['done_msg'] == 'Restart signal has been sent to the VPS'){
            return response()->json($output['done_msg'], 200);
        }else{
            $error = "Please try again!";
            return response()->json($error, 500);
        }
    }

    public function rebuild(Request $request)
    {
        $post = array();
        $post['vpsid'] = $request->vpsid;
        $post['format_primary'] = $request->format_disk_flag;
        $post['osid'] = $request->selected_osid;
        $post['newpass'] = $request->root_pwd;
        $post['conf'] = $request->root_pwd;
        $output = $this->virtualizorAdmin->rebuild($post);
        
        if($output['done'] == 1){
            return response()->json('VPS is being rebuilt, hence no actions are allowed to be performed on this VPS', 200);
        }else{
            return response()->json($output['error'], 500);
        }
    }

    public function checkhostName(Request $request)
    {
        $exist_flag = false;
        $page = 1;
        $reslen = 100;
        $vs_list = array();
        do {
            $result = $this->virtualizorAdmin->listvs($page, $reslen);
            $vs_list = array_merge($vs_list, $result);
            $page++;
        } while (count($result) == $reslen);

        foreach ($vs_list as $vs) {
            if ($vs['hostname'] == $request->hostname) {
                $exist_flag = true;
            }
        }

        if($exist_flag) return response()->json('Already Exist.', 200);
        else return response()->json('No Exist.', 200);
    }

    public function changehostNames(Request $request)
    {
        $post = array();
        $post['vpsid'] = $request->vpsid;
        $post['hostname'] = $request->hostname;
        $result = $this->virtualizorAdmin->managevps($post);
        if($result['done']['done']){
            return response()->json('Your hostname will be changed when the VPS is booted again', 200);
        }else{
            return response()->json('Oops! We meet some error!.', 500);
        }
    }

    public function changeRootPwd(Request $request)
    {
        $post = array();
        $post['vpsid'] = $request->vpsid;
        $post['rootpass'] = $request->root_pwd;
        $result = $this->virtualizorAdmin->managevps($post);
        if($result['done']['change_pass_msg']){
            return response()->json('VPS password will be changed after you SHUTDOWN and START the VPS from the panel.', 200);
        }else{
            return response()->json('Oops! We meet some error!.', 500);
        }

    }

    private function serverMonitering($vpsid){
        $result = $this->virtualizorAdmin->performance($vpsid);
        print_r($result);exit;
    }

    private function getinvoiceInfo($order_id)
    {
        $orders_response = (new \Sburina\Whmcs\Client)->post([
            'action' => 'GetOrders',
            'userid' => Auth::user()->client_id,
            'id' => $order_id,
        ]);

        $page = 1;
        $start = 1;
        $reslen = 100;
        $invoice_list = array();
        do {
            $invoices_response = (new \Sburina\Whmcs\Client)->post([
                'action' => 'GetInvoices',
                'limitstart' => $start,
                'limitnum' => $reslen,
                'userid' => Auth::user()->client_id,
            ]);
            $invoice_list = array_push($invoice_list, $invoices_response['invoices']['invoice']);
            $page++;
            $start = ($page-1) * $reslen + 1;
        } while ($invoices_response['numreturned'] == $reslen);

        foreach($invoice_list as $invoice){
            if($invoice['id'] == $orders_response['orders']['order']['invoiceid']){
                $invoice_info = $invoice;
            }
        }

        return $invoice_info;
    }
}
