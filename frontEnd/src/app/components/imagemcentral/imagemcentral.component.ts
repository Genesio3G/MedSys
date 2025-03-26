import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-imagemcentral',
  standalone: false,
  templateUrl: './imagemcentral.component.html',
  styleUrls: ['./imagemcentral.component.css']
})
export class ImagemcentralComponent implements OnInit {
  imagensSlides: string[] = [
    'assets/images/1.jpg', // Substitua com os nomes das imagens reais
    'assets/images/2.jpg',
    'assets/images/3.jpg'
  ];
  indiceSlideAtual: number = 0;

  // Notícias para rolagem
  noticias: string[] = [
    'Notícia 1: Atualização importante!',
    'Notícia 2: Evento a ser realizado amanhã.',
    'Notícia 3: Nova tecnologia lançada.'
  ];

  ngOnInit(): void {
    this.iniciarApresentacaoSlides();
    this.iniciarRolagemNoticias();
  }

  iniciarApresentacaoSlides(): void {
    setInterval(() => {
        this.indiceSlideAtual = (this.indiceSlideAtual + 1) % this.imagensSlides.length;
    }, 30000); // Troca o slide a cada 30 segundos (30.000 ms)
  }

  iniciarRolagemNoticias(): void {
    setInterval(() => {
        const noticiaRemovida = this.noticias.shift(); // Remove a primeira notícia
        if (noticiaRemovida) {
            this.noticias.push(noticiaRemovida); // Adiciona-a ao final do array
        }
    }, 600000); // Troca a notícia a cada 10 minutos (600.000 ms)
  }

}
