import { Component } from '@angular/core';
import { NavbarComponent } from '../../shared/navbar/navbar.component';
import { FooterComponent } from '../../shared/footer/footer.component';

@Component({
  selector: 'app-curiosities',
  imports: [NavbarComponent, FooterComponent],
  templateUrl: './curiosities.component.html',
  styleUrl: './curiosities.component.css'
})
export class CuriositiesComponent {

}
