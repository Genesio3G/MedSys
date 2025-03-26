import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FooterConvidadoComponent } from './footer-convidado.component';

describe('FooterConvidadoComponent', () => {
  let component: FooterConvidadoComponent;
  let fixture: ComponentFixture<FooterConvidadoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [FooterConvidadoComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(FooterConvidadoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
