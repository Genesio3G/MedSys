import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EncontrarcentromedicoConvidadoComponent } from './encontrarcentromedico-convidado.component';

describe('EncontrarcentromedicoConvidadoComponent', () => {
  let component: EncontrarcentromedicoConvidadoComponent;
  let fixture: ComponentFixture<EncontrarcentromedicoConvidadoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [EncontrarcentromedicoConvidadoComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(EncontrarcentromedicoConvidadoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
