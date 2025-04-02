# 1ª SEMANA - Mentoria Técnica
![enter image description here](https://d112y698adiu2z.cloudfront.net/photos/production/software_photos/003/291/713/datas/gallery.jpg)

# # Descrição Detalhada do Protótipo AquaLab

O **AquaLab** é um drone aquático inovador baseado num design de catamarã, desenvolvido para **monitorizar e analisar a qualidade da água em tempo real** em ambientes aquáticos. Equipado com **sensores, telemetria e um sistema de recolha de amostras**, este protótipo utiliza **Arduino e comunicação sem fios** para fornecer dados ambientais de forma eficiente e sustentável, contribuindo para a preservação dos ecossistemas aquáticos.  

---

## 🌊 Principais Componentes e Funcionalidades  

### 1️⃣ Sensores para Monitorização da Qualidade da Água  

- **Sensor de Turbidez**: Mede a transparência da água, identificando partículas em suspensão.  
- **Sensor de pH** *(implementação a definir)*: Poderá ser utilizado para medir a acidez ou alcalinidade da água.  
- **Sensor de Condutividade Elétrica** *(implementação a definir)*: Pode ser utilizado para medir a quantidade de sais dissolvidos na água, indicando possíveis níveis de poluição.  

---

### 2️⃣ Sistema de Recolha de Amostras  

- **Mini bomba de água vertical**: Responsável por recolher amostras de água.  
- **Recipiente de 50 ml**: Armazena a amostra recolhida para posterior análise.  
- **Sensor de Nível de Água**: Monitoriza a capacidade do recipiente e interrompe automaticamente a recolha quando estiver cheio.  
- O sistema de recolha apenas será ativado quando necessário, evitando desperdício de energia e otimizando a operação.  

---

### 3️⃣ Telemetria de Imagem via Rádio  

- **Câmera FPV**: Captura imagens e transmite em tempo real.  
- **Kit RC832 e TS832**: Sistema de transmissão e receção de vídeo via rádio.  
- **Monitor LCD FPV**: Permite visualizar as imagens transmitidas pelo drone aquático em tempo real.  

---

### 4️⃣ Transmissão e Visualização dos Dados em Tempo Real  

- **Comunicação entre Arduinos**: O Arduino a bordo do **AquaLab** transmite os dados dos sensores para outro Arduino em terra via rádio.  
- **Display LCD 20x4**: Apresenta os dados recolhidos pelo drone aquático em tempo real.  

💡 Ainda estamos a avaliar a melhor abordagem para a disponibilização dos dados:  

- **Transmissão em Tempo Real para um Website**: Se viável, os dados serão enviados diretamente para um site acessível online.  
- **Geração de Ficheiro para Upload Posterior**: Caso os sensores de **pH e condutividade elétrica** sejam utilizados apenas para análise em terra, poderá fazer mais sentido armazenar os dados num ficheiro e carregá-los no site após cada missão.  

---

### 5️⃣ Sistema de Iluminação e Sinalização  

- **Barra de luz LED frontal**: Ilumina a área à frente do drone aquático para melhor visibilidade em condições de pouca luz.  
- **Faróis LED quadrados**: Complementam a iluminação, garantindo um melhor alcance.  
- **Tiras LED laterais para sinalização:**  
  - **Lado direito**: LED verde.  
  - **Lado esquerdo**: LED vermelho.  
- Estes LEDs laterais ajudam a indicar a posição e orientação do drone aquático, especialmente em ambientes com pouca visibilidade.  

---

### 6️⃣ Sistema de Alimentação Sustentável  

- **Dois painéis solares**: Responsáveis por fornecer energia adicional ao sistema, ajudando a alimentar os LEDs e reduzindo a dependência de baterias externas.  

---

### 7️⃣ Decisão Estratégica Sobre a Medição da Qualidade da Água  

- Ainda está em estudo se os sensores de **pH e condutividade elétrica** serão integrados diretamente no drone aquático ou se as medições serão realizadas em terra com a amostra recolhida.  
- Ambas as abordagens possuem vantagens e desvantagens, sendo que a decisão será tomada com base na precisão dos sensores e na facilidade de implementação no protótipo.  

---

## 🎯 Objetivo do Projeto  

O **AquaLab** pretende ser uma ferramenta **acessível, eficiente e sustentável** para a **monitorização da qualidade da água**, combinando **sensores ambientais, telemetria de imagem e recolha de amostras**. Este drone aquático poderá ser utilizado para **estudos ambientais, apoio à investigação científica e monitorização de locais de difícil acesso**.  

# 📦 Lista de Materiais - AquaLab  

## 🔌 Cabos e Conectores  
- **Kit Jumper Cable 10CM (MM/MF/FF)** - x2  
- **Kit Jumper Cable 20CM (MM/MF/FF)** - x1  
- **Cabo de extensão de servo (100mm)** - x10  
- **Cabo de extensão de servo dupla (150mm)** - x5  
- **Cabo de extensão de servo tripla (150mm)** - x2  
- **Conector Male T-Plug** - x1  
- **Conector Male JST Plug** - x10  
- **Conector Female JST Plug** - x10  
- **Conector DC** - x1  

## ⚙️ Componentes Eletrônicos  
- **Arduino Uno** - x2  
- **Arduino Nano** - x1  
- **433Mhz RF Kit** - x1  
- **Módulo regulador de tensão (5A)** - x1  
- **Motor Shield (MX1508)** - x1  
- **Motor Shield (L298N)** - x1  
- **Capacitor 10V 470UF** - x2  
- **Fio de cobre elétrico (26 AWG, 5m)** - x1  

## 🔋 Alimentação e Energia  
- **Painel solar 58x23mm (0.23W 5V)** - x2  
- **Bateria Lipo (7.4V 5000mAh)** - x1  
- **Power Switch de conector servo** - x1  
- **Power Switch de conector JST** - x2  

## 📡 Sensores  
- **Sensor DH22 (Temperatura e Humidade)** - x1  
- **Sensor de nível de água** - x1  
- **Sensor de Turbidez** - x1  
- **Sensor de Condutividade Elétrica** - x1  
- **Sensor de PH** - x1  
- **Sensor DS18B20 (Temperatura da água)** - x1  

## 🚤 Motores e Propulsão  
- **Kit de hélices para barco RC** - x1  
- **Mini bomba de água vertical** - x1  

## 💡 Iluminação  
- **LED Red 60x8mm** - x1  
- **LED Green 60x8mm** - x1  
- **LED White 60x8mm** - x1  
- **Faróis quadrados de LED RC** - x1  
- **Barra de luz de LEDs RC (53mm)** - x1  

## 🎥 Telemetria e Monitorização  
- **Câmera FPV** - x1  
- **LCD FPV Monitor** - x1  
- **RC832 e TS832 Kit (Transmissão de vídeo via rádio)** - x1  
- **Display LCD 20x4** - x1  

## 🏗️ Estrutura e Outros  
- **Recipiente 50ml (Recolha de amostras)** - x1  
- **Tubo plástico maleável (1m)** - x1  
- **Drone aquático (Impresso em 3D)** - x1  
- **Filamento 3D (PLA)** - x1  

