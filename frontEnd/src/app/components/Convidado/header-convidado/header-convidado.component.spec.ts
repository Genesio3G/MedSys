import { ComponentFixture, TestBed } from '@angular/core/testing';

import { HeaderConvidadoComponent } from './header-convidado.component';

describe('HeaderConvidadoComponent', () => {
  let component: HeaderConvidadoComponent;
  let fixture: ComponentFixture<HeaderConvidadoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [HeaderConvidadoComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(HeaderConvidadoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
