import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EspecialidadesmedicasComponent } from './especialidadesmedicas.component';

describe('EspecialidadesmedicasComponent', () => {
  let component: EspecialidadesmedicasComponent;
  let fixture: ComponentFixture<EspecialidadesmedicasComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [EspecialidadesmedicasComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(EspecialidadesmedicasComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
