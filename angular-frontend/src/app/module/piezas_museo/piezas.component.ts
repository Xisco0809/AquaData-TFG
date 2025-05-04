import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-piezas', // Selector corregido
  standalone: true,
  imports: [CommonModule], // Importa CommonModule
  templateUrl: './piezas.component.html', // Apunta a su propio HTML
  //styleUrl: './piezas.component.css' // Opcional: si tiene estilos
})
export class PiezasComponent {
  // Aquí va la lógica del componente
}