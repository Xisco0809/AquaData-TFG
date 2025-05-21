import { Component } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import { CommonModule } from '@angular/common'; // Importa CommonModule
import { NavbarComponent } from './modules/shared/navbar/navbar.component';
import { FooterComponent } from './modules/shared/footer/footer.component';

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [RouterOutlet, CommonModule, FooterComponent], // Añade LandingComponent y CommonModule
  templateUrl: './app.component.html',
  //styleUrl: './app.component.css'
})
export class AppComponent {
  title = 'angular-frontend';
}