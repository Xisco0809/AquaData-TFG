import { Component } from '@angular/core';
import { NavbarComponent } from '../../shared/navbar/navbar.component';
import { FooterComponent } from '../../shared/footer/footer.component';

@Component({
  selector: 'app-diary',
  imports: [NavbarComponent, FooterComponent],
  templateUrl: './diary.component.html',
  
})
export class DiaryComponent {

}
