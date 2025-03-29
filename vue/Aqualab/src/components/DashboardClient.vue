<template>
  <div class="container mt-4 mb-5">
    <h2 class="card-title" style="color: #55b8ca;">Dashboard</h2>
    <div id="content" ref="content" class=" space-x-4 mb-6 stats mt-4">
      <div class="flex space-x-4 mb-6 ">
        <input v-model="year" type="number" class="border p-2" placeholder="Ano" />
        <select v-model="month" class="border p-2">
          <option :value="null">Todos os meses</option>
          <option value="1">Janeiro</option>
          <option value="2">Fevereiro</option>
          <option value="3">Março</option>
          <option value="4">Abril</option>
          <option value="5">Maio</option>
          <option value="6">Junho</option>
          <option value="7">Julho</option>
          <option value="8">Agosto</option>
          <option value="9">Setembro</option>
          <option value="10">Outubro</option>
          <option value="11">Novembro</option>
          <option value="12">Dezembro</option>
        </select>

        <select v-model="day" class="border p-2" :disabled="!month">
          <option :value="null">Todos os dias</option>
          <option v-for="d in 31" :key="d" :value="d">{{ d }}</option>
        </select>

        <button @click="fetchData" class="bg-blue-500 text-white p-2 rounded"> <i class="bi bi-funnel"></i>
          Filtrar</button>
        <button @click="exportToPDF" class="bg-green-500 text-white p-2 rounded"> <i class="bi bi-share-fill"></i>
          Exportar PDF</button>
        <button @click="sendEmail" class="bg-yellow-500 text-white p-2 rounded"> <i class="bi bi-envelope"></i>
          Partilhar PDF por E-mail</button>

      </div>

      <div class="row">
        <div class="col-md-12">
          <GChart type="LineChart" :data="lineChartData" :options="chartOptions(chartTitles.lineChart)" />
        </div>
      </div>

      <div class="row mt-1">
        <div class="col-md-6">
          <GChart v-if="temperatureData.length" type="AreaChart" :data="temperatureData"
            :options="chartOptions(chartTitles.temperatureChart)" />

        </div>
        <div class="col-md-6">
          <GChart v-if="temperatureWaterData.length" type="AreaChart" :data="temperatureWaterData"
            :options="chartOptions4(chartTitles.temperatureWaterChart)" />

        </div>
      </div>


      <div class="row mt-1">
        <div class="col-md-6">
          <GChart v-if="phData.length" type="AreaChart" :data="phData" :options="chartOptions2(chartTitles.phChart)" />
        </div>
        <div class="col-md-6">
          <GChart v-if="humidityData.length" type="AreaChart" :data="humidityData" :options="chartOptions5(chartTitles.humidityChart)" />
        </div>
      </div>

      <div class="row mt-1">
        <div class="col-md-6">
          <GChart v-if="turbidityData.length" type="AreaChart" :data="turbidityData"
            :options="chartOptions3(chartTitles.turbityChart)" />
        </div>
      </div>


    </div>
  </div>
</template>
<script>
import { ref, computed, onMounted } from "vue";
import { GChart } from "vue-google-charts";
import axios from "axios";
import html2canvas from "html2canvas";
import jsPDF from "jspdf";
import logo from '@/assets/logo2.png'; // Imagem no Vue
import { toast } from 'vue3-toastify';

export default {
  methods: {
    exportToPDF() {
      const content = this.$refs.content;

      // Captura o conteúdo da página como imagem
      html2canvas(content, {
        allowTaint: true,
        useCORS: true, // Permite capturar gráficos do Google Charts (por causa da política de CORS)
        scale: 2, // Aumenta a qualidade da imagem gerada
        //(se for para enviar email, meter scale 1 porque o 2 é demasiado grande torna o ficheiro grande)
      }).then((canvas) => {
        const imgData = canvas.toDataURL("image/png");

        // Cria um novo documento PDF
        const doc = new jsPDF({
          orientation: "portrait", // ou "landscape" se preferir
          unit: "mm",
          format: "a3",
        });

        // Definindo a capa preta
        doc.setFillColor(85, 184, 202);
        doc.rect(0, 0, doc.internal.pageSize.width, doc.internal.pageSize.height, 'F');

        // Adicionando o logotipo
        const logoWidth = 200;
        const logoHeight = 200;
        const logoX = (doc.internal.pageSize.width - logoWidth) / 2; // Centralizado
        const logoY = 100; //Distancia do logo smart4fiances do topo da página da capa (como se fosse mt-x)
        doc.addImage(logo, 'PNG', logoX, logoY, logoWidth, logoHeight);

        doc.addPage(); // Isso vai para a segunda página

        const imgWidth = 220; // Define a largura desejada
        const imgHeight = (canvas.height * imgWidth) / canvas.width; // Mantém a proporção

        doc.addImage(imgData, "PNG", 40, 40, imgWidth, imgHeight);

        // Guarda o PDF
        doc.save("Aqualab_Relatorio.pdf");
        toast.success("Relatório descarregado com sucesso!");

      });
    },
  },

  components: { GChart },
  setup() {
    const year = ref(new Date().getFullYear());
    const month = ref(null);
    const day = ref(null);
    const temperatureData = ref([]);
    const turbidityData = ref([]);
    const phData = ref([]);
    const humidityData = ref([]);
    const lineChartData = ref([]);
    const temperatureWaterData = ref([]);


    const chartTitles = computed(() => ({
      lineChart: `Temperatura Ambiente(ºC), PH (ph), Turbidez (NTU), Temperatura da Água (ºC)`,
      temperatureChart: `Temperatura Ambiente (ºC)`,
      temperatureWaterChart: `Temperatura da Água (ºC)`,
      phChart: `PH (ph)`,
      turbityChart: `Turbidez (NTU)`,
      humidityChart: "Humidade Relativa do Ar (%)"
    }));

    const fetchData = async () => {
      try {
        const response = await axios.get("/sensor-statistics", {
          params: { year: year.value, month: month.value, day: day.value },
        });

        const labelType = determineLabelType();

        temperatureData.value = formatChartData(response.data.temperature, labelType, "Temperatura Ambiente");
        phData.value = formatChartData(response.data.ph, labelType, "pH");
        turbidityData.value = formatChartData(response.data.turbidity, labelType, "Turbidez");
        temperatureWaterData.value = formatChartData(response.data.temperatureWater, labelType, "Temperatura da Água");
        humidityData.value = formatChartData(response.data.humidity, labelType, "Humidade Relativa do Ar");

        lineChartData.value = formatLineChartData(
          response.data.temperature,
          response.data.ph,
          response.data.turbidity,
          response.data.temperatureWater,
          labelType
        );
      } catch (error) {
        console.error("Erro ao selecionar dados", error);
      }
    };

    const determineLabelType = () => {
      if (year.value && !month.value) return "Mês";   // Apenas ano → Mês X
      if (year.value && month.value && !day.value) return "Dia";  // Ano + Mês → Dia X
      if (year.value && month.value && day.value) return "Hora"; // Ano + Mês + Dia → Hora X
      return "Mês"; // Padrão
    };

    const formatChartData = (data, labelType, label2) => {
      const formatted = [[labelType, label2]];

      if (Object.keys(data).length === 0) {
        formatted.push(["Sem dados", 0]);
      } else {
        for (const key in data) {
          formatted.push([`${labelType} ${key}`, parseFloat(data[key])]);
        }
      }

      return formatted;
    };

    const formatLineChartData = (temperature, ph, turbidity,temperatureWater, labelType) => {
      const formatted = [[labelType, "Temperatura Ambiente", "PH", "Turbidez", "Temperatura da Água"]];

      const allKeys = [...new Set([
        ...Object.keys(temperature),
        ...Object.keys(ph),
        ...Object.keys(turbidity),
        ...Object.keys(temperatureWater),
      ])].sort((a, b) => a - b);

      if (allKeys.length === 0) {
        formatted.push(["Sem dados", 0, 0, 0]);
      } else {
        allKeys.forEach((key) => {
          formatted.push([
            `${labelType} ${key}`,
            parseFloat(temperature[key] || 0),
            parseFloat(ph[key] || 0),
            parseFloat(turbidity[key] || 0),
            parseFloat(temperatureWater[key] || 0)
          ]);
        });
      }

      return formatted;
    };

    const chartOptions = (title) => ({
      title: title,
      width: '100%',
      height: window.innerWidth < 768 ? 300 : 500,
      legend: { position: "bottom" },
      is3D: false,
      backgroundColor: "transparent",
      colors: ["#55b8ca", "#4CAF50", "#FF9800", "#0852a6"],
    });

    const chartOptions2 = (title) => ({
      title: title,
      width: '100%',
      height: window.innerWidth < 768 ? 300 : 500,
      legend: { position: "bottom" },
      is3D: false,
      backgroundColor: "transparent",
      colors: ["#4CAF50"],
    });

    const chartOptions3 = (title) => ({
      title: title,
      width: '100%',
      height: window.innerWidth < 768 ? 300 : 500,
      legend: { position: "bottom" },
      is3D: false,
      backgroundColor: "transparent",
      colors: ["#FF9800"],
    });

    const chartOptions4 = (title) => ({
      title: title,
      width: '100%',
      height: window.innerWidth < 768 ? 300 : 500,
      legend: { position: "bottom" },
      is3D: false,
      backgroundColor: "transparent",
      colors: ["#0852a6"],
    });

    const chartOptions5 = (title) => ({
      title: title,
      width: '100%',
      height: window.innerWidth < 768 ? 300 : 500,
      legend: { position: "bottom" },
      is3D: false,
      backgroundColor: "transparent",
      colors: ["#ff0062"],
    });

    const sendEmail = async () => {
      try {
        const content = document.querySelector("#content");
        html2canvas(content, {
          allowTaint: true,
          useCORS: true,
          //1.2 está no limite máximo do que o gmail permite de mb por email de forma gratuita
          scale: 1.2, // Para envio por e-mail, manter a escala menor para reduzir o tamanho do arquivo
        }).then((canvas) => {
          const imgData = canvas.toDataURL("image/png");
          const doc = new jsPDF({
            orientation: "portrait",
            unit: "mm",
            format: "a3",
          });

          // Definindo a capa preta
          doc.setFillColor(85, 184, 202);
        doc.rect(0, 0, doc.internal.pageSize.width, doc.internal.pageSize.height, 'F');

        // Adicionando o logotipo
        const logoWidth = 200;
        const logoHeight = 200;
        const logoX = (doc.internal.pageSize.width - logoWidth) / 2; // Centralizado
        const logoY = 100; //Distancia do logo smart4fiances do topo da página da capa (como se fosse mt-x)
        doc.addImage(logo, 'PNG', logoX, logoY, logoWidth, logoHeight);


          doc.addPage();

          const imgWidth = 220;
          const imgHeight = (canvas.height * imgWidth) / canvas.width;
          doc.addImage(imgData, "PNG", 40, 40, imgWidth, imgHeight);

          const pdfBlob = doc.output("blob"); // Gera um blob do PDF

          const formData = new FormData();
          formData.append("file", pdfBlob, "Aqualab_Relatorio.pdf");

          axios.post("/send-email", formData, {
            headers: { "Content-Type": "multipart/form-data" },
          })
            .then(() => {
              toast.success("E-mail enviado com sucesso!");
            })
            .catch(() => {
              toast.error("Erro ao enviar e-mail.");
            });
        });
      } catch (error) {
        toast.error("Erro ao enviar o E-mail");
        console.error("Erro ao enviar email", error);
      }
    };

    onMounted(fetchData);




    return {
      year,
      month,
      day,
      temperatureData,
      temperatureWaterData,
      phData,
      turbidityData,
      humidityData,
      fetchData,
      chartOptions,
      chartOptions2,
      chartOptions3,
      chartOptions5,
      lineChartData,
      chartTitles,
      chartOptions4,
      sendEmail,
    };
  },
};
</script>