import { Routes } from '@angular/router';
import { LandingComponent } from './modules/pages/landing/landing.component';
import { RegisterComponent } from './modules/pages/register/register.component';
import { LoginComponent } from './modules/pages/login/login.component';
import { MainMenuComponent } from './modules/pages/main-menu/main-menu.component';
import { DiaryComponent } from './modules/pages/diary/diary.component';
import { MarineSpeciesComponent } from './modules/pages/marine-species/marine-species.component';
import { NewsComponent } from './modules/pages/news/news.component';
import { CuriositiesComponent } from './modules/pages/curiosities/curiosities.component';
import { AboutUsComponent } from './modules/pages/about-us/about-us.component';
import { UserComponent } from './modules/pages/user/user.component';


export const routes: Routes = [
    {path: '', component: LandingComponent}, // Cambia a LandingComponent
    {path: 'register', component: RegisterComponent},
    {path: 'login', component: LoginComponent},
    {path: 'main-menu', component: MainMenuComponent},
    {path: 'diary', component: DiaryComponent},
    {path: 'marine-species', component: MarineSpeciesComponent},
    {path: 'news', component: NewsComponent},
    {path: 'curiosities', component: CuriositiesComponent},
    {path: 'about-us', component: AboutUsComponent},
    {path: 'user', component: UserComponent},
];