<template>
    <Bar
        :chart-options="chartOptions"
        :chart-data="chartData"
        :chart-id="chartId"
        :dataset-id-key="datasetIdKey"
        :plugins="plugins"
        :css-classes="cssClasses"
        :styles="styles"
        :width="width"
        :height="height"
    />
</template>

<script>
import { Bar } from "vue-chartjs/legacy";

import {
    Chart as ChartJS,
    Title,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LinearScale,
} from "chart.js";

ChartJS.register(
    Title,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LinearScale
);

export default {
    name: "BarChart",
    components: {
        Bar,
    },
    props: {
        chartId: {
            type: String,
            default: "bar-chart",
        },
        datasetIdKey: {
            type: String,
            default: "label",
        },
        width: {
            type: Number,
            default: 400,
        },
        height: {
            type: Number,
            default: 400,
        },
        cssClasses: {
            default: "",
            type: String,
        },
        styles: {
            type: Object,
            default: () => {},
        },
        plugins: {
            type: Array,
            default: () => [],
        },
    },
    data() {
        return {
            chartData: {
                labels: [
                    "Gen",
                    "Feb",
                    "Mar",
                    "Apr",
                    "Mag",
                    "Giu",
                    "Lug",
                    "Ago",
                    "Set",
                    "Ott",
                    "Nov",
                    "Dic",
                ],
                datasets: [
                    {
                        label: "Data One",
                        backgroundColor: [
                            "rgb(244, 180, 0)",
                            "rgb(149, 246, 0)",
                            "rgb(149, 246, 231)",
                            "rgb(149, 246, 252)",
                            "rgb(44, 197, 252)",
                            "rgb(44, 139, 252)",
                            "rgb(244, 180, 0)",
                            "rgb(44, 197, 252)",
                            "rgb(149, 246, 231)",
                            "rgb(149, 246, 252)",
                            "rgb(44, 197, 252)",
                            "rgb(44, 139, 252)",
                        ],
                        borderRadius: 50,
                        data: [40, 20, 12, 39, 10, 40, 39, 80, 40, 20, 12, 11],
                    },
                ],
            },
            chartOptions: {
                plugins: {
                    legend: {
                        display: false,
                    },
                },
                scales: {
                    y: {
                        grid: {
                            display: false,
                        },
                        angleLines: {
                            display: false,
                        },
                        ticks: {
                            display: false,
                        },
                    },
                },
                responsive: true,
                maintainAspectRatio: false,
            },
        };
    },
};
</script>
