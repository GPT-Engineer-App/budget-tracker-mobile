document.addEventListener("DOMContentLoaded", function () {
  const gastosCtx = document.getElementById("gastosChart").getContext("2d");
  const economiasCtx = document.getElementById("economiasChart").getContext("2d");
  const investimentosCtx = document.getElementById("investimentosChart").getContext("2d");

  new Chart(gastosCtx, {
    type: "line",
    data: {
      labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho"],
      datasets: [
        {
          label: "Gastos",
          data: [100, 200, 150, 300, 250, 400],
          borderColor: "#e74c3c",
          fill: false,
        },
      ],
    },
  });

  new Chart(economiasCtx, {
    type: "line",
    data: {
      labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho"],
      datasets: [
        {
          label: "Economias",
          data: [50, 100, 75, 150, 125, 200],
          borderColor: "#e74c3c",
          fill: false,
        },
      ],
    },
  });

  new Chart(investimentosCtx, {
    type: "line",
    data: {
      labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho"],
      datasets: [
        {
          label: "Investimentos",
          data: [200, 300, 250, 400, 350, 500],
          borderColor: "#e74c3c",
          fill: false,
        },
      ],
    },
  });
});
