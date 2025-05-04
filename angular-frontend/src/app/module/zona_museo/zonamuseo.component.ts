import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-zonamuseo', // Selector corregido
  standalone: true,
  imports: [CommonModule], // Importa CommonModule
  templateUrl: './zonamuseo.component.html', // Apunta a su propio HTML
  //styleUrl: './zonamuseo.component.css' // Opcional: si tiene estilos
})
export class ZonaMuseoComponent {
  // Aquí va la lógica del componente
}