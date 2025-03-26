import { ComponentFixture, TestBed } from '@angular/core/testing';

import { LoginMedicosComponent } from './login-medicos.component';

describe('LoginMedicosComponent', () => {
  let component: LoginMedicosComponent;
  let fixture: ComponentFixture<LoginMedicosComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [LoginMedicosComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(LoginMedicosComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
