import { Component } from '@angular/core';
import { NavbarComponent } from '../../shared/navbar/navbar.component';
import { FooterComponent } from '../../shared/footer/footer.component';
import { RouterLink } from '@angular/router';
import { FormsModule } from '@angular/forms'; // Importante para [(ngModel)]
import { CommonModule } from '@angular/common'; // Necesario para usar ngIf, ngFor, etc.

@Component({
  selector: 'app-user',
  imports: [NavbarComponent, RouterLink, FooterComponent, FormsModule, CommonModule],
  templateUrl: './user.component.html',
  styleUrl: './user.component.css',
  standalone: true
})
export class UserComponent {
  userName: string = 'Xisco0809';

  // Estado del modal
  showModal: boolean = false;

  // Datos del formulario (simulados inicialmente)
  editName: string = this.userName;
  editEmail: string = 'xisco@email.com';
  editPassword: string = '';

  // Abrir modal
  openModal() {
    this.showModal = true;
  }

  // Cerrar modal
  closeModal() {
    this.showModal = false;
  }

  // Guardar cambios (aquí podrías conectar con Symfony vía HTTP más adelante)
  saveChanges() {
    this.userName = this.editName;
    this.closeModal();
    console.log('Cambios guardados:', {
      nombre: this.editName,
      correo: this.editEmail,
      contraseña: this.editPassword
    });
  }
}
