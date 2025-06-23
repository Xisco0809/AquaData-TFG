import { Component, ViewChild, ElementRef, AfterViewInit } from '@angular/core';
import { NavbarComponent } from "../../shared/navbar/navbar.component";
import { FooterComponent } from "../../shared/footer/footer.component";
import { RouterLink } from '@angular/router';

@Component({
  selector: 'app-main-menu',
  standalone: true,
  imports: [NavbarComponent, FooterComponent, RouterLink],
  templateUrl: './main-menu.component.html',
  // styleUrl: './main-menu.component.css'
})
export class MainMenuComponent implements AfterViewInit {

  // Referencia para el slider de Curiosidades
  @ViewChild('curiosidadesCarousel', { static: false }) curiosidadesCarousel!: ElementRef<HTMLDivElement>;

  // Referencia para el slider de Noticias
  @ViewChild('noticiasCarousel', { static: false }) noticiasCarousel!: ElementRef<HTMLDivElement>;

  constructor() { }

  ngAfterViewInit(): void {
    // Puedes verificar que las referencias están disponibles aquí
    // console.log('Curiosidades Carousel:', this.curiosidadesCarousel?.nativeElement);
    // console.log('Noticias Carousel:', this.noticiasCarousel?.nativeElement);
  }

  // Métodos para el slider de Curiosidades
  scrollCuriosidadesLeft(): void {
    if (this.curiosidadesCarousel && this.curiosidadesCarousel.nativeElement) {
      const scrollAmount = this.curiosidadesCarousel.nativeElement.clientWidth;
      this.curiosidadesCarousel.nativeElement.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
    } else {
      console.warn('El carrusel de curiosidades no está disponible para desplazamiento a la izquierda.');
    }
  }

  scrollCuriosidadesRight(): void {
    if (this.curiosidadesCarousel && this.curiosidadesCarousel.nativeElement) {
      const scrollAmount = this.curiosidadesCarousel.nativeElement.clientWidth;
      this.curiosidadesCarousel.nativeElement.scrollBy({ left: scrollAmount, behavior: 'smooth' });
    } else {
      console.warn('El carrusel de curiosidades no está disponible para desplazamiento a la derecha.');
    }
  }

  // Métodos para el slider de Noticias
  scrollNoticiasLeft(): void {
    if (this.noticiasCarousel && this.noticiasCarousel.nativeElement) {
      const scrollAmount = this.noticiasCarousel.nativeElement.clientWidth;
      this.noticiasCarousel.nativeElement.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
    } else {
      console.warn('El carrusel de noticias no está disponible para desplazamiento a la izquierda.');
    }
  }

  scrollNoticiasRight(): void {
    if (this.noticiasCarousel && this.noticiasCarousel.nativeElement) {
      const scrollAmount = this.noticiasCarousel.nativeElement.clientWidth;
      this.noticiasCarousel.nativeElement.scrollBy({ left: scrollAmount, behavior: 'smooth' });
    } else {
      console.warn('El carrusel de noticias no está disponible para desplazamiento a la derecha.');
    }
  }
}