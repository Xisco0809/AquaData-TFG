import { Component } from '@angular/core';
import { RouterOutlet } from '@angular/router';
//import { LandingComponent } from "./module/landing/landing.component";
import { CommonModule } from '@angular/common'; // Importa CommonModule
//import { EntradasComponent } from './module/entradas/entradas.component';

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [RouterOutlet, CommonModule], // Añade LandingComponent y CommonModule
  templateUrl: './app.component.html',
  styleUrl: './app.component.css'
})
export class AppComponent {
  title = 'angular-frontend';
}