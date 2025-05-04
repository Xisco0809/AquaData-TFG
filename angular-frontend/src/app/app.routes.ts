import { Routes } from '@angular/router';
import { LandingComponent } from './module/landing/landing.component';
import { EntradasComponent } from './module/entradas/entradas.component';
import { HorariosComponent } from './module/horarios/horarios.component';
import { ZonaMuseoComponent } from './module/zona_museo/zonamuseo.component';
import { PiezasComponent } from './module/piezas_museo/piezas.component';

export const routes: Routes = [
    {path: "", component: LandingComponent},
    {path: "entradas", component: EntradasComponent},
    {path: "horarios", component: HorariosComponent},
    {path: "zonamuseo", component: ZonaMuseoComponent},
    {path: "piezas", component: PiezasComponent},
];