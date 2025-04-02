# 📌 2ª Deliverable – AquaLab  

## 1️⃣ Definição do Problema  
A falta de monitorização contínua da qualidade da água impede a deteção precoce de contaminações, colocando em risco **ecossistemas aquáticos, populações que dependem de recursos hídricos e setores que dependem de água limpa**.  

📌 **Fatos Relevantes:**  
- **80% das águas residuais** do mundo são descartadas sem tratamento. (*ONU, 2023*)  
- **50% dos rios, lagos e reservatórios de água doce na Europa** estão poluídos. (*Agência Europeia do Ambiente, 2022*)  
- As **perdas económicas globais devido à poluição da água** são estimadas em **470 mil milhões de dólares** por ano. (_Banco Mundial, 2023_)
- O mercado global de **sensores ambientais** está projetado para atingir **3,7 mil milhões de dólares** até **2026**, impulsionado pela necessidade crescente de **monitorização ambiental**.”  (Markets and Markets, 2023)
- Empresas de saneamento e governos **têm dificuldade em obter dados em tempo real**, tornando mais difícil a prevenção de crises ambientais.  

Os métodos tradicionais de análise são **lentos, caros e exigem amostras manuais**, o que dificulta uma resposta rápida a problemas como derrames químicos ou crescimento excessivo de algas tóxicas.  

### **Quem é afetado por este problema?**  
- **Governos e entidades ambientais** → Precisam de dados para regulamentação e fiscalização.  
- **Empresas de saneamento** → Necessitam de monitorização contínua para garantir padrões de qualidade.  
- **Comunidades ribeirinhas e pescadores** → Dependem de água limpa para a sua subsistência.  
- **ONGs e universidades** → Trabalham na recolha de dados para estudos e proteção ambiental.  

📌 **Impacto Global:**
-  A poluição hídrica contribui para **1,8 milhão de mortes por ano** devido a doenças relacionadas com a água contaminada. (*OMS, 2023*)
- **Apenas 20% dos países** possuem sistemas de monitorização adequados para avaliar a qualidade da água de forma contínua. (*ONU, 2022*) 
- **80% das águas residuais** são descartadas sem tratamento, contaminando ecossistemas e reduzindo a biodiversidade aquática. (*ONU, 2023*)
-  A **falta de dados sobre a qualidade da água** compromete políticas públicas e dificulta ações de sustentabilidade.
-  Sem monitorização contínua, a **poluição da água pode demorar meses ou anos a ser detetada**, agravando impactos ambientais e económicos.

📌 **Conclusão:** Há uma necessidade clara de um sistema **acessível, rápido e eficiente** para recolher dados da água e disponibilizá-los para análise posterior, permitindo a deteção precoce de problemas ambientais.  

---

## 2️⃣ Validação do Problema  
Os métodos tradicionais de análise de água são **limitados e demorados**, levando a falhas na identificação precoce de contaminações e dificultando ações rápidas para mitigar impactos ambientais.

### 📊 **Evidências sobre a necessidade de monitorização da água**  
Os métodos tradicionais de análise da água apresentam limitações significativas: 
- **Custo elevado:** Testes laboratoriais podem custar entre **50€ e 500€ por amostra**, tornando a monitorização contínua inviável para muitas entidades.
- **Tempo de espera:** Os resultados podem demorar **dias ou semanas**, o que atrasa a resposta a derrames químicos ou crescimento excessivo de algas tóxicas.
- **Cobertura limitada:** Sensores fixos cobrem apenas pontos específicos e não oferecem uma visão ampla da qualidade da água em ecossistemas dinâmicos.

**📌 Impacto da Falta de Monitorização Contínua**
- Nos **EUA, 2022**, a poluição por nitratos contaminou **30% das reservas de água subterrânea**, impactando milhões de pessoas. (*EPA, 2022*)
-  **80% das águas residuais no mundo** são despejadas sem tratamento adequado, aumentando a necessidade de uma **monitorização eficiente e acessível**. (*ONU, 2023*)

**📌 Porque é que os métodos atuais são insuficientes?** 
- **Testes laboratoriais:** São caros e demorados, inviabilizando monitorizações frequentes.
-  **Sensores fixos:** Embora precisos, têm um custo elevado e não oferecem dados contínuos, cobrem áreas muito limitadas e não conseguem fornecer um panorama amplo da qualidade da água.
-  **Falta de automação e acessibilidade:** Pequenas comunidades e ONGs não têm meios para realizar monitorização contínua.

📌 **Conclusão:** Existe uma necessidade urgente de um sistema que **facilite a recolha e transmissão de dados de forma contínua e acessível**, permitindo intervenções mais rápidas e informadas. O AquaLab responde a este problema, oferecendo uma solução portátil, económica e sustentável para a monitorização ambiental.

---

## 3️⃣ Definição do Produto/Solução  

### 🌊 **O que é o AquaLab?**  
O **AquaLab** é um **drone aquático** baseado num **catamarã**, desenvolvido para recolher dados da água, transmiti-los em tempo real e recolher amostras de água para posterior análise da mesma para determinar a qualidade e a possível necessidade de intervir na mesma, o AquaLab fornece dados precisos para ajudar na **gestão sustentável de recursos hídricos**.

### ⚙️ **Como funciona?**   
- **Monitorização em tempo real:** Sensores medem **turbidez, temperatura da água, temperatura do ambiente, humidade relativa do ar, pH e condutividade elétrica**.
- **Transmissão de dados:** Envio de dados via rádio para um ecrã LCD e armazenamento em ficheiro para análise posterior numa **plataforma web**. 
- **Transmissão de imagem:** Câmera FPV integrada para **monitorização visual em tempo real via telemetria**.
- **Recolha de amostras:** Sistema automatizado com **bomba de sucção e sensor de nível** para recolher amostras de água para análises laboratoriais detalhadas.
- **Energia sustentável:** Alimentação por **baterias recarregáveis e painéis solares**, garantindo maior autonomia.
- **Plataforma digital integrada:** Permite visualizar e analisar os dados recolhidos, facilitando a tomada de decisões ambientais.

---

## 4️⃣ MVP - Produto Mínimo Viável  

O **MVP (Minimum Viable Product)** do AquaLab será a primeira versão funcional do drone aquático, focada nas funcionalidades essenciais para validar o conceito e realizar os primeiros testes de monitorização da qualidade da água.  

### 📌 **Funcionalidades essenciais do MVP**  
✅ Estrutura do catamarã para a estabilidade na água.  
✅ Integração de **sensores essenciais**: turbidez, temperatura da água, pH e condutividade elétrica.  
✅ **Transmissão de dados via rádio** para um ecrã LCD em tempo real.  
✅ **Recolha de amostras de água** com uma bomba de sucção e sensor de nível de água.
✅ **Sistema de telemetria de imagem** com câmera FPV para visualização ao vivo.  
✅ **Alimentação híbrida** com baterias e painéis solares para maior autonomia.  
✅ **Registo de dados em ficheiro** para posterior análise e integração com plataforma web.  

### 📌 **O que será validado no MVP?**  
🔹 **Precisão dos sensores** em diferentes ambientes aquáticos.  
🔹 **Autonomia da bateria e eficiência dos painéis solares.**  
🔹 **Alcance da comunicação via rádio e qualidade da transmissão de dados.**  
🔹 **Eficiência da recolha de amostras e integridade das amostras transportadas.**  

📌 **Conclusão:** O MVP do AquaLab servirá como a base para testar e refinar as principais funcionalidades antes da implementação completa, garantindo que a solução atenda às necessidades do mercado.  

---

## 5️⃣ Proposta de Valor  

### 🎯 **Para quem o AquaLab cria valor?**  
O AquaLab foi projetado para responder à necessidade de **monitorização contínua da qualidade da água**, criando valor para diversos setores:  

- **Entidades Governamentais e Reguladoras** → Facilitam a **fiscalização ambiental** e ajudam a criar políticas públicas mais eficazes.  
- **Empresas de Saneamento** → Permitem **monitorização em tempo real**, reduzindo custos operacionais e melhorando a eficiência na gestão da água.  
- **ONGs e Projetos de Conservação** → Oferecem dados detalhados para a **proteção de ecossistemas aquáticos** e identificação precoce de contaminações.  
- **Universidades e Centros de Pesquisa** → Possibilitam estudos científicos e ensino prático sobre **sensorização e sustentabilidade**.  
- **Indústrias Agrícolas e Energéticas** → Auxiliam na **gestão responsável dos recursos hídricos** usados na produção agrícola e industrial.  

### 🆚 **Principais Diferenciais do AquaLab**  
Atualmente, a monitorização da qualidade da água enfrenta desafios significativos, como **custos elevados, métodos demorados e baixa acessibilidade a tecnologias avançadas**. O AquaLab resolve essas limitações através de:  

| **Característica**              | **Métodos Tradicionais**  | **AquaLab**            |  
|---------------------------------|----------------------|------------------------|  
| **Custo**                        | Alto (€50-500/amostra) | **Mais acessível**  |  
| **Tempo de análise**             | Dias/semanas        | **Tempo real**         |  
| **Acessibilidade**               | Limitada            | **Alta, uso remoto**   |  
| **Abrangência**                  | Pontos fixos        | **Grande cobertura**   |  
| **Transmissão de imagem**        | Inexistente         | **Câmera FPV integrada** |  
| **Recolha de amostras**          | Manual              | **Automatizada com sensor de nível** |  
| **Sustentabilidade**             | Dependente de eletricidade | **Painéis solares e baterias recarregáveis** |  
| **Visualização de dados**        | Necessário laboratório | **Ecrã LCD e plataforma web** |  

📌 **Conclusão:** O **AquaLab destaca-se como uma solução portátil, económica e eficiente**, permitindo que governos, empresas e universidades realizem **monitorização contínua e autónoma** da qualidade da água de forma mais acessível e sustentável, ajudando na preservação dos recursos hídricos.  

### 🚀 **Oportunidades Estratégicas para o Projeto**  
O AquaLab tem um grande potencial para **expansão e inovação**. Algumas das oportunidades estratégicas incluem:  

✅ **Integração com Inteligência Artificial** → Para prever padrões de contaminação e melhorar a precisão dos relatórios.  
✅ **Expansão Internacional** → Aplicação em países onde a falta de monitorização da água é um problema crítico.  
✅ **Kit Educacional** → Criar uma versão do AquaLab acessível para escolas e universidades.  
✅ **Melhoria da Plataforma Web** → Desenvolvimento de um dashboard interativo com gráficos avançados e alertas automáticos.  
✅ **Parcerias com Grandes Empresas** → Estabelecer acordos com indústrias que necessitam de **monitorização ambiental contínua**.  

📌 **Objetivo:** Tornar o **AquaLab uma referência na recolha e análise de dados ambientais**, proporcionando inovação e sustentabilidade no setor da monitorização da qualidade da água. 🚀  

---

## 6️⃣ Implementação no Mercado  

### 🎯 **Público-Alvo**  
 - **Entidades governamentais:** Para regulamentação e fiscalização ambiental. 
 - **Empresas de saneamento:** Para monitorização contínua da qualidade da água. 
 - **ONGs ambientais:** Para projetos de conservação e monitorização de rios, lagos e oceanos.
 -  **Universidades e centros de pesquisa:** Para estudos científicos e projetos educacionais.
 -  **Indústrias agrícolas e energéticas:** Que dependem da gestão sustentável dos recursos hídricos.

### 📢 **Modo de Implementação no Mercado** 
A introdução do AquaLab no mercado será realizada em **três fases estratégicas**: 

1️⃣ **Validação e Testes-Piloto** 
- Implementação do AquaLab em parceria com **universidades e ONGs ambientais** para validar a tecnologia.
-  Testes em diferentes ambientes (lagos, rios, zonas costeiras) para garantir a fiabilidade dos sensores.
-  Ajustes no sistema de transmissão de dados e na plataforma web. 

2️⃣ **Lançamento para Setores-Chave** 
- Comercialização inicial para **universidades, governos e empresas**.
-  Implementação em projetos-piloto financiados por instituições ambientais.
-  Apresentação do produto em **feiras tecnológicas e ambientais**. 

3️⃣ **Escala e Expansão do Mercado** 
- Parcerias com grandes entidades públicas e privadas para adoção do AquaLab em larga escala.
-  Expansão internacional para países com **necessidade crítica de monitorização da água**.
-  Desenvolvimento de novas versões do AquaLab, com sensores adicionais e maior autonomia.

### 💡 **Modelos de Receita**
Para garantir a viabilidade financeira, o AquaLab terá **cinco modelos de comercialização**: 

1️⃣ **Venda Direta** → Para governos, empresas e universidades.

2️⃣ **Modelo de Assinatura** → Acesso a relatórios detalhados gerados por IA através da plataforma web. 

3️⃣ **Consultoria e Parcerias** → Desenvolvimento de versões especializadas em conjunto com universidades e governos.

4️⃣**Parcerias Estratégicas** → Com ONGs e instituições de pesquisa para implementação e validação.

5️⃣ **Kit AquaLab** → Versão modular e educativa do AquaLab, vendida para **escolas, universidades e centros de pesquisa**, permitindo a aprendizagem prática sobre **robótica, sensorização e monitorização ambiental**.

📌 **Objetivo:** Criar um **modelo de negócio sustentável e escalável**, garantindo que o AquaLab seja acessível tanto para grandes organizações como para instituições de ensino e pesquisa.`

### 📢 **Estratégias de Marketing e Divulgação** 
Para garantir uma adoção eficiente do AquaLab, serão utilizadas as seguintes estratégias: 

📌 **Marketing Digital** 
- Criação de um **website oficial** com informações detalhadas, demonstrações e casos de uso.
-  Campanhas publicitárias para atrair tráfego orgânico e investidores.
-  **Redes sociais** (LinkedIn, Twitter, YouTube) para divulgar testes, estudos e benefícios do AquaLab. 

📌 **Feiras e Conferências** 
- Participação em eventos ambientais e tecnológicos para apresentação do produto.
-  Demonstrações ao vivo para potenciais clientes e parceiros estratégicos. 

📌 **Workshops e Formações** 
- Realização de workshops para **universidades, ONGs e empresas** interessadas no uso da tecnologia.
-  Parcerias com instituições académicas para integrar o AquaLab em programas de investigação. 

📌 **Publicações Científicas e Casos de Sucesso** 
- Publicação de estudos de caso demonstrando os benefícios do AquaLab em comparação com métodos tradicionais.
-  Apresentação de resultados obtidos em testes-piloto para consolidar a credibilidade do projeto.

📌 **Objetivo:** Tornar o **AquaLab uma referência na recolha e análise de dados ambientais**, facilitando decisões informadas para a preservação dos recursos hídricos e promovendo um modelo de **sustentabilidade e inovação tecnológica**.

---

## 7️⃣ Próximos Passos  

### 📈 **Métricas de Sucesso (KPIs)** 
Para medir o progresso do AquaLab, serão utilizados os seguintes indicadores: 

✅ **Eficiência do Protótipo** → Número de protótipos testados em diferentes ambientes (lagos, rios, zonas costeiras). 
✅ **Precisão das medições** → Comparação dos valores dos sensores com análises laboratoriais. 
✅ **Fiabilidade da transmissão de dados** → Percentagem de pacotes de dados recebidos corretamente. 
✅ **Adoção por stakeholders** → Quantidade de parcerias estabelecidas (universidades, ONGs, governos). 
✅ **Plataforma digital** → Número de utilizadores na plataforma web. 
✅ **Autonomia energética** → Tempo de operação do AquaLab.

### ⚠️ **Principais Desafios**  

🔴 **Precisão dos sensores** → Garantir calibração contínua e minimizar margens de erro nas medições. 
🔴 **Comunicação de dados** → Melhorar a estabilidade da transmissão via rádio para evitar perdas de informação. 
🔴 **Interface da plataforma web** → Criar uma experiência de utilizador intuitiva para visualização dos dados recolhidos. 
🔴 **Eficiência da recolha de amostras** → Testar e validar a fiabilidade do sistema de recolha automática de água. 
🔴 **Adoção por entidades públicas e privadas** → Demonstrar viabilidade económica e impacto ambiental positivo. 
🔴 **Sustentabilidade financeira** → Definir um modelo de negócios escalável e sustentável a longo prazo.
🔴  **Produção em escala:** Manter a qualidade enquanto se reduz custos.

### 🎯 **Objetivos Estratégicos para a Fase Final da Competição** 

1️⃣ **Finalizar o MVP** → Concluir a integração dos sensores e recolha de amostras. 
2️⃣ **Realizar testes extensivos** → Executar testes em diferentes ambientes (lagos, rios, zonas costeiras) para validar o desempenho, robustez e adaptabilidade. 
3️⃣ **Ajustar a plataforma web** → Melhorar a interface, gráficos e o armazenamento de dados. 
4️⃣ **Aprimorar a comunicação via rádio** → Otimizar a transmissão para evitar falhas. 
5️⃣ **Criar uma estratégia de validação de mercado** → Desenvolver um pitch sólido para apresentar a potenciais investidores e parceiros. 
6️⃣ **Definir um roadmap de longo prazo** → Planear a evolução do AquaLab após a competição, incluindo melhorias e novas funcionalidades.

📌 **Conclusão:** O **AquaLab** representa uma **solução inovadora** para a recolha e transmissão de dados sobre a qualidade da água, permitindo uma **monitorização contínua e em tempo real** que auxilia investigadores, governos e empresas a tomarem decisões mais informadas para a **preservação dos recursos hídricos**. Ao facilitar o acesso a dados críticos, o AquaLab contribui para a identificação precoce de contaminações e para a implementação de medidas preventivas, promovendo um **futuro mais sustentável**. 🚀  

---

