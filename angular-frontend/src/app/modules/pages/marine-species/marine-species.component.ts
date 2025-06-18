import { Component } from '@angular/core';
import { NavbarComponent } from '../../shared/navbar/navbar.component';
import { FooterComponent } from '../../shared/footer/footer.component';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-species',
  standalone: true,
  imports: [NavbarComponent, FooterComponent, CommonModule],
  templateUrl: './marine-species.component.html',
})
export class MarineSpeciesComponent {
  showDetails: boolean[] = new Array(10).fill(false);

  toggleDetails(index: number): void {
    this.showDetails[index] = !this.showDetails[index];
  }

  especies = [
    {
      nombre: 'Delfín común\n(Delphinus delphis)',
      imagen: 'Especies marinas/delfinComun.jpg',
      alt: 'Delfín común',
      descripcion: 'El delfín común (Delphinus delphis) es una especie muy social que habita aguas templadas y tropicales. Se distingue por su coloración en forma de reloj de arena.',
    },
    {
      nombre: 'Pez luna\n(Mola mola)',
      imagen: 'Especies marinas/molamola.jpg',
      alt: 'Pez luna',
      descripcion: 'El pez luna (Mola mola) es el pez óseo más pesado del mundo. Suele encontrarse cerca de la superficie tomando el sol tras inmersiones profundas.',
    },
    {
      nombre: 'Dentón\n(Dentex dentex)',
      imagen: 'Especies marinas/denton.jpg',
      alt: 'Dentón',
      descripcion: 'El dentón (Dentex dentex) es un pez de gran tamaño y valor comercial, conocido por su carne sabrosa. Habita en fondos rocosos y se encuentra en el Mediterráneo y el Atlántico oriental.',
    },
    {
      nombre: 'Foca Monje\n(Monachus monachus)',
      imagen: 'Especies marinas/foca.jpg',
      alt: 'Foca Monje',
      descripcion: 'El pez luna (Mola mola) es el pez óseo más pesado del mundo. Suele encontrarse cerca de la superficie tomando el sol tras inmersiones profundas.',
    },
    {
      nombre: 'Serrano\n(Serranus cabrilla)',
      imagen: 'Especies marinas/serrano.jpg',
      alt: 'Pez serrano',
      descripcion: 'El serrano (Serranus cabrilla) es un pez de la familia Serranidae, conocido por su coloración brillante y su sabor delicado. Habita en fondos rocosos y se encuentra en el Mediterráneo y el Atlántico oriental.',
    },
    {
      nombre: 'Medusas\n(Cnidaria)',
      imagen: 'Especies marinas/medusa.jpg',
      alt: 'Medusa',
      descripcion: 'Las medusas (Cnidaria) son animales marinos gelatinosos que pueden encontrarse en todos los océanos. Algunas especies son conocidas por sus picaduras dolorosas.',
    },
    {
      nombre: 'Rorcual\n(Balaenoptera physalus)',
      imagen: 'Especies marinas/rorcual.jpg',
      alt: 'Rorcual',
      descripcion: 'El rorcual (Balaenoptera physalus) es la segunda ballena más grande del mundo. Se caracteriza por su velocidad y su capacidad para realizar saltos espectaculares fuera del agua.',
    },
    {
      nombre: 'Tortuga Boba\n(Caretta caretta)',
      imagen: 'Especies marinas/tortuga.jpg',
      alt: 'Tortuga Boba',
      descripcion: 'La tortuga boba (Caretta caretta) es una especie de tortuga marina que se encuentra en aguas tropicales y subtropicales. Es conocida por su caparazón duro y su capacidad para migrar largas distancias.',
    },
    {
      nombre: 'Sargo\n(Diplodus sargus)',
      imagen: 'Especies marinas/sargo.jpg',
      alt: 'Sargo',
      descripcion: 'El sargo (Diplodus sargus) es un pez de la familia Sparidae, conocido por su cuerpo alargado y su coloración plateada. Habita en fondos rocosos y se encuentra en el Mediterráneo y el Atlántico oriental.',
    },
    {
      nombre: 'Dorada\n(Sparus aurata)',
      imagen: 'Especies marinas/dorada.webp',
      alt: 'Dorada',
      descripcion: 'La dorada (Sparus aurata) es un pez de gran valor comercial, conocido por su carne sabrosa y su coloración dorada. Habita en aguas costeras del Mediterráneo y el Atlántico oriental.',
    },
    // Añade más especies...
  ];
}

