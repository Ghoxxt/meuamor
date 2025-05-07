<?php
$start_date = '2022-04-01 12:00:00'; // Altere para a data de vocês
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
  <title>Casal L&L 💖</title>
  <style>
    body {
      background: #1c1c1c; /* Fundo escuro */
      font-family: 'Comic Sans MS', cursive;
      text-align: center;
      overflow-x: hidden;
      color: #fff; /* Texto branco para contraste */
    }

    h1 {
      color: #ff3385; /* Rosa forte */
      margin-top: 20px;
    }

    #slideshow {
      width: 250px;
      height: 250px;
      margin: 30px auto 0;
      border: 5px solid #ff3385; /* Rosa forte */
      border-radius: 50%;
      box-shadow: 0 0 20px #ff3385; /* Rosa forte */
      overflow: hidden;
      position: relative;
    }

    .slide {
      width: 100%;
      height: 100%;
      object-fit: cover;
      position: absolute;
      top: 0;
      left: 0;
      border-radius: 50%;
      display: none;
    }

    .slide.active {
      display: block;
    }

    #legenda {
      margin-top: 10px;
      font-size: 18px;
      color: #ff3385; /* Rosa forte */
    }

    #contador {
      font-size: 24px;
      color: #ff3385; /* Rosa forte */
      margin-top: 20px;
    }

    .heart {
      position: absolute;
      color: #ff3385; /* Rosa forte */
      animation: flutuar linear infinite;
      font-size: 24px;
    }

    @keyframes flutuar {
      0% { transform: translateY(100vh); opacity: 1; }
      100% { transform: translateY(-78vh); opacity: 0; }
    }

    button {
      margin-top: 20px;
      padding: 10px 20px;
      font-size: 20px;
      background: #ff3385; /* Rosa forte */
      color: white;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      box-shadow: 0 0 10px #ff3385; /* Rosa forte */
      transition: 0.3s;
    }

    button:hover {
      background: #e6005c; /* Rosa mais escuro */
    }

    #mensagem {
      display: none;
      margin-top: 30px;
      font-size: 22px;
      color: #fff; /* Texto branco */
      padding: 20px;
      background: #333; /* Fundo escuro */
      border-radius: 15px;
      box-shadow: 0 0 10px #ff3385; /* Rosa forte */
      max-width: 600px;
      margin-left: auto;
      margin-right: auto;
      min-height: 100px;
    }

    audio {
      display: none;
    }
  </style>
</head>
<body>

  <h1>💗 Casal L&L 💗</h1>

  <div id="slideshow">
    <img class="slide active" src="foto1.jpg" alt="Foto 1">
    <img class="slide" src="foto2.jpg" alt="Foto 2">
    <img class="slide" src="foto3.jpg" alt="Foto 3">
    <img class="slide" src="foto4.jpg" alt="Foto 4">
  </div>
  <div id="legenda">Algumas fotos que eu tenho nossa </div>

  <div id="contador"></div>

  <button id="btn-musica" onclick="tocarMusica()">Tocar música 🎵</button><br>
  <button id="btn-surpresa" onclick="mostrarMensagem()">Clique aqui 💌</button>

  <div id="mensagem"></div>

  <audio id="audio" loop>
    <source src="looking-out-for-you.mp3" type="audio/mpeg">
  </audio>

  <script>
    const startDate = new Date("<?php echo $start_date; ?>");

    function atualizaTempo() {
      const now = new Date();
      const diff = now - startDate;

      const segundosTotais = Math.floor(diff / 1000);
      const segundos = segundosTotais % 60;
      const minutos = Math.floor(segundosTotais / 60) % 60;
      const horas = Math.floor(segundosTotais / 3600) % 24;
      const dias = Math.floor(segundosTotais / 86400);
      const meses = Math.floor(dias / 30.4375);
      const anos = Math.floor(meses / 12);

      const texto = `
        Estamos juntos há:<br>
        <strong>${anos}</strong> anos, 
        <strong>${meses % 12}</strong> meses, 
        <strong>${dias % 30}</strong> dias,<br>
        <strong>${horas}</strong> horas, 
        <strong>${minutos}</strong> minutos e 
        <strong>${segundos}</strong> segundos!
      `;

      document.getElementById("contador").innerHTML = texto;
    }

    setInterval(atualizaTempo, 1000);
    atualizaTempo();

    function criaCoracao() {
      const heart = document.createElement('div');
      heart.classList.add('heart');
      heart.innerHTML = '❤️';
      heart.style.left = Math.random() * 100 + "vw";
      heart.style.animationDuration = (Math.random() * 3 + 3) + "s";
      document.body.appendChild(heart);
      setTimeout(() => heart.remove(), 5000);
    }

    setInterval(criaCoracao, 10);

    function tocarMusica() {
      const audio = document.getElementById("audio");
      audio.play();
      document.getEleId("btn-musica").innerText = "Música tocando 🎶";
      document.getElementById("btn-musica").disabled = true;
    }

    function mostrarMensagem() {
  const mensagem = "Amor, cada segundo contigo é um presente que eu jamais pensei que teria. Obrigado por estar comigo, por ser você, e por me fazer sentir tão completo. Amo você de todas as formas, desarrumada, ajeitada, carente, raivosa, beijoqueira, loba solitária. Odeio te ver triste ou mal, principalmente quando sou eu que te faço ficar assim, mas sempre chegamos em um acordo e melhoramos. Te agradeço por tudo, por ser uma mulher incrível, inteligente, trabalhadora, guerreira, safada😏, além de ser super fiel e única, uma jóia rara que eu tive a sorte de encontrar. 💖";
  const div = document.getElementById("mensagem");
  const btn = document.getElementById("btn-surpresa");
  div.style.display = 'block';
  btn.style.display = 'none';

  let i = 0;
  div.innerHTML = '';
  const speed = 40;

  function digita() {
    if (i < mensagem.length) {
      div.innerHTML += mensagem.charAt(i);
      i++;
      setTimeout(digita, speed);
    }
  }

  digita();

}


    // SLIDESHOW
    const slides = document.querySelectorAll(".slide");
    const legenda = document.getElementById("legenda");
    const legendas = [
      "Quando começamos a usar aliança💍💍",
      "Adoro essas fotos da comp de Maringá🥰",
      "Batemos recordes... 👀👀" , 
      "Adoro essa aquiiiii, preciso tirar mais fotos🥰😍"
    ];
    let currentSlide = 0;

    function trocaSlide() {
      slides[currentSlide].classList.remove("active");
      currentSlide = (currentSlide + 1) % slides.length;
      slides[currentSlide].classList.add("active");
      legenda.innerText = legendas[currentSlide];
    }

    setInterval(trocaSlide, 3000);
  </script>

</body>
</html>
