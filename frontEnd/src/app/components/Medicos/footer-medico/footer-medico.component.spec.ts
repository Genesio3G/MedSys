import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FooterMedicoComponent } from './footer-medico.component';

describe('FooterMedicoComponent', () => {
  let component: FooterMedicoComponent;
  let fixture: ComponentFixture<FooterMedicoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [FooterMedicoComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(FooterMedicoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
