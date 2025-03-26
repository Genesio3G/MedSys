import { ComponentFixture, TestBed } from '@angular/core/testing';

import { UnidadehospitalarComponent } from './unidadehospitalar.component';

describe('UnidadehospitalarComponent', () => {
  let component: UnidadehospitalarComponent;
  let fixture: ComponentFixture<UnidadehospitalarComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [UnidadehospitalarComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(UnidadehospitalarComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
