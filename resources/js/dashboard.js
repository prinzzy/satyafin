document.addEventListener("DOMContentLoaded", function () {
    var ctx = document.getElementById("transactionsChart").getContext("2d");
    var monthlyData = JSON.parse(document.getElementById("monthlyData").value);
    var chart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: [
                "January",
                "February",
                "March",
                "April",
                "May",
                "June",
                "July",
                "August",
                "September",
                "October",
                "November",
                "December",
            ],
            datasets: [
                {
                    label: "Number of Transactions",
                    data: monthlyData,
                    backgroundColor: "rgba(54, 162, 235, 0.2)",
                    borderColor: "rgba(54, 162, 235, 1)",
                    borderWidth: 1,
                },
            ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    });
});
