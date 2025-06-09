import { ComponentFixture, TestBed } from '@angular/core/testing';

import { MarineSpeciesComponent } from './marine-species.component';

describe('MarineSpeciesComponent', () => {
  let component: MarineSpeciesComponent;
  let fixture: ComponentFixture<MarineSpeciesComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [MarineSpeciesComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(MarineSpeciesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
