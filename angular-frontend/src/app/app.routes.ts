import { Routes } from '@angular/router';
import { LandingComponent } from './modules/pages/landing/landing.component';
import { RegisterComponent } from './modules/pages/register/register.component';
import { LoginComponent } from './modules/pages/login/login.component';
import { MainMenuComponent } from './modules/pages/main-menu/main-menu.component';

export const routes: Routes = [
    {path: '', component: LandingComponent}, // Cambia a LandingComponent
    {path: 'register', component: RegisterComponent},
    {path: 'login', component: LoginComponent},
    {path: 'main-menu', component: MainMenuComponent}
];