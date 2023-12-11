<template>
  <div class="2xl:h-[300px] h-auto">
    <canvas :id="canvasid" class="w-full"></canvas>
  </div>
</template>

<script setup>
import { Chart, registerables } from "chart.js";
Chart.register(...registerables);
import { ref, onMounted, onBeforeUnmount } from "vue";

let myChart = ref(null);

const props = defineProps({
  canvasid: {
    default: "canvas",
  },
  data : {
    required : true,
  },
  label : {
    required : true,
  }
});

const colors = {
  purple: {
    default: "rgba(2, 109, 235, .7)",
    half: "rgba(2, 109, 235, 0.5)",
    quarter: "rgba(2, 109, 235, .3)",
    zero: "rgba(2, 109, 235, 0)",
  },
  indigo: {
    default: "rgba(80, 102, 120, 1)",
    quarter: "rgba(80, 102, 120, 0.25)",
  },
};


onMounted(() => {
  let ctx = document.getElementById(`${props.canvasid}`).getContext("2d");
  ctx.canvas.height = 300;

  let gradient = ctx.createLinearGradient(0, 25, 0, 300);
  gradient.addColorStop(0, colors.purple.half);
  gradient.addColorStop(0.35, colors.purple.quarter);
  gradient.addColorStop(1, colors.purple.zero);

  const options = {
    type: "line",
    data: {
      labels: props.label,
      datasets: [
        {
          fill: true,
          backgroundColor: gradient,
          pointBackgroundColor: colors.purple.default,
          borderColor: colors.purple.default,
          data: props.data,
          lineTension: 0,
          borderWidth: 1,
          pointRadius: 0,
        },
      ],
    },
    options: {
      plugins: {
        title: {
          // display: true,
          // text: 'Chart Title',
        },
        legend: {
          display: false,
          labels: {
            font: {
              size: 14,
            },
          },
        },
      },
      layout: {
        padding: {
          left: 30,
          right: 40,
          top: 0,
          bottom: 20,
        },
      },
      responsive: true,
      scales: {
        x: {
          grid: {
            display: false,
          },
          ticks: {
            padding: 0,
            autoSkip: false,
            maxRotation: 0,
            minRotation: 0,
          },
        },
        y: {
          scale: {
            display: false,
            padding: 10,
          },
          grid: {
            display: true,
            color: colors.indigo.quarter,
          },
          border: {
            dash: [15, 20],
          },
          ticks: {
            beginAtZero: true,
            display: false,
            max: 63,
            min: 0,
            padding: 0,
          },
        },
      },
    },
  };
  myChart.value = new Chart(ctx, options);
  
});

onBeforeUnmount(() => {
  myChart.value.destroy();
});
</script>
