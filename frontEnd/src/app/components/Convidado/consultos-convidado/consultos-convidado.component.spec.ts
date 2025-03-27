import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ConsultosConvidadoComponent } from './consultos-convidado.component';

describe('ConsultosConvidadoComponent', () => {
  let component: ConsultosConvidadoComponent;
  let fixture: ComponentFixture<ConsultosConvidadoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ConsultosConvidadoComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ConsultosConvidadoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
