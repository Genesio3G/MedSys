import { ComponentFixture, TestBed } from '@angular/core/testing';

import { HeaderMedicoComponent } from './header-medico.component';

describe('HeaderMedicoComponent', () => {
  let component: HeaderMedicoComponent;
  let fixture: ComponentFixture<HeaderMedicoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [HeaderMedicoComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(HeaderMedicoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
