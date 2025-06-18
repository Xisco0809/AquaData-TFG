import { Component } from '@angular/core';
import { NavbarComponent } from '../../shared/navbar/navbar.component';
import { FooterComponent } from '../../shared/footer/footer.component';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-news',
  standalone: true,
  imports: [NavbarComponent, FooterComponent, CommonModule],
  templateUrl: './news.component.html',
})
export class NewsComponent {
  expandedIndex: number | null = null;

  toggleParagraph(index: number): void {
    if (this.expandedIndex === index) {
      this.expandedIndex = null;
    } else {
      this.expandedIndex = index;
    }
  }

 noticias = [
    {
      titulo: 'Capturan tiburón peregrino de 7m en Girona',
      imagen: 'News/Tiburon peregrino.avif',
      alt: 'Tiburón peregrino',
      contenido: 'Un grupo de pescadores ha capturado accidentalmente un tiburón peregrino de siete metros en Port de la Selva, Girona.\nEste ejemplar fue liberado tras su captura.',
    },
    {
      titulo: 'España ampliará reservas marinas',
      imagen: 'News/Cachalotes.avif',
      alt: 'Cachalotes',
      contenido: 'El Gobierno español ha anunciado la ampliación de sus reservas marinas para proteger la biodiversidad del Mediterráneo, incluyendo zonas de cría de cachalotes.',
    },
    {
      titulo: 'Aumentan varamientos de mantas en Valencia',
      imagen: 'News/Manta.webp',
      alt: 'Manta',
      contenido: 'La manta (Mobula mobular), una raya en peligro, ha sido vista con mayor frecuencia en las costas de la Comunidad Valenciana.',
    },
    {
      titulo: 'Nueva especie de molusco descubierta',
      imagen: 'News/Molusco.webp',
      alt: 'Molusco',
      contenido: 'Investigadores de la Fundación Oceanogràfic descubren una nueva especie de molusco en el Mediterráneo.',
    },
    {
      titulo: 'La foca monje sobrevive en Grecia',
      imagen: 'News/Foca.webp',
      alt: 'Foca monje',
      contenido: 'La foca monje, una especie en peligro, ha encontrado refugio en Grecia, aunque sigue amenazada por la pesca y la contaminación.',
    },
    {
      titulo: 'España refuerza investigación marina',
      imagen: 'News/FondoMarino.jpg',
      alt: 'Fondo marino',
      contenido: 'El Gobierno de España reafirma su compromiso con la investigación y la protección del Mediterráneo con nuevas áreas protegidas.',
    },
    {
      titulo: 'Peligros del\nMediterráneo',
      imagen: 'News/PezAraña.jpg',
      alt: 'Pez araña',
      contenido: 'El Mediterráneo alberga fauna que puede representar riesgos para los humanos. Aprende a reconocerlas y cómo actuar.',
    },
    {
      titulo: 'Avistan tiburón blanco en la Costa Azul',
      imagen: 'News/TiburonBlanco.webp',
      alt: 'Tiburón blanco',
      contenido: 'Un tiburón blanco ha sido avistado cerca de la Costa Azul francesa, generando preocupación en la zona.',
    },
    {
      titulo: 'Contaminación marina: causas y lucha',
      imagen: 'News/Plastico.webp',
      alt: 'Contaminación por plástico',
      contenido: 'La contaminación marina afecta los ecosistemas y la salud humana. Conoce sus causas y cómo podemos combatirla.',
    },
    {
      titulo: 'El Mediterráneo en 6 cifras alarmantes',
      imagen: 'News/FotografoTiburon.webp',
      alt: 'Fotógrafo con tiburón',
      contenido: 'El mar Mediterráneo enfrenta problemas ambientales como pérdida de biodiversidad, plásticos, sobrepesca y acidificación.',
    },
  ];
}
