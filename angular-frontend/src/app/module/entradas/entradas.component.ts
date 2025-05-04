import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-entradas', // Selector corregido
  standalone: true,
  imports: [CommonModule], // Importa CommonModule
  templateUrl: './entradas.component.html', // Apunta a su propio HTML
  //styleUrl: './entradas.component.css' // Opcional: si tiene estilos
})
export class EntradasComponent {
  // Aquí va la lógica del componente
}