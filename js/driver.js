// Will be filled with canvas
var ChartJSPHP = [];

// Converts functions in json from strings to actual functions
function evalFunctions(chartArray) {
    for (let key in chartArray) {
        const value = chartArray[key];
        if (value instanceof Array || value instanceof Object) {
            evalFunctions(value);
        } else if (typeof value === "string" && value.indexOf('function(') === 0) {
            chartArray[key] = eval("(" + value + ")");
        }
    }
}

// Render chart on page load
$(function() {
    // Getting all chart.js canvas
    let elements = document.querySelectorAll("[data-chartjs]");

    // Looping every canvas
    for (let canvas of elements) {
        const id = canvas.id;

        // Getting ctx from canvas
        const ctx = canvas.getContext('2d');

        // Getting values in data attributes
        const htmlData = canvas.dataset;
        const options = JSON.parse(htmlData.options);
        evalFunctions(options)
        const config = {
            type: htmlData.chartjs,
            data: JSON.parse(htmlData.data),
            options: options
        };
        // Creating chart and saving for later use
        ChartJSPHP[id] = new Chart(ctx, config);
    }
});