import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-home',
  standalone: false,
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {
  slideIndex = 0;

  ngOnInit(): void {
    this.showSlides();
  }

  showSlides(): void {
    const slides = document.getElementsByClassName("mySlides") as HTMLCollectionOf<HTMLElement>;

    // Oculta todas as imagens
    for (let i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }

    // Avança para o próximo slide
    this.slideIndex++;
    if (this.slideIndex > slides.length) {
      this.slideIndex = 1;
    }

    // Exibe o slide atual
    slides[this.slideIndex - 1].style.display = "block";

    // Configura um timeout para chamar a função novamente após 5 segundos
    setTimeout(() => this.showSlides(), 5000);
  }
}