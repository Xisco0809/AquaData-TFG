import { Component } from '@angular/core';
import { NavbarComponent } from '../../shared/navbar/navbar.component';
import { FooterComponent } from '../../shared/footer/footer.component';

@Component({
  selector: 'app-news',
  imports: [NavbarComponent, FooterComponent],
  templateUrl: './news.component.html',

})
export class NewsComponent {

}
