<template>
    <div class="card">
        <div class="header bg-yellow-400 text-center p-4">
            <h3>Clothes</h3>
        </div>
        <div class="body">
            <canvas id="pie-chart" width="800" height="450"></canvas>
        </div>
    </div>
</template>

<script>
import Chart from "chart.js";

export default {
    data() {
        return {
            data: "",
            labels:""
        };
    },
    mounted() {
        this.labels = clothes;
        this.data = clothesValues;

        var myChart = new Chart(document.getElementById("pie-chart"), {
            type: "pie",
            data: {
                labels: this.labels,
                datasets: [
                    {
                        label: "Population (millions)",
                        backgroundColor: [
                            "#3e95cd",
                            "#8e5ea2",
                            "#3cba9f",
                            "#e8c3b9",
                            "#c45850",
                            "#ccceee"
                        ],
                        data: this.data
                    }
                ]
            },
            options: {
                title: {
                    display: false,
                    text: "Predicted world population (millions) in 2050"
                }
            }
        });
    }
};
</script>

<style></style>
