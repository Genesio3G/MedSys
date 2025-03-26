import { ComponentFixture, TestBed } from '@angular/core/testing';

import { HomeConvidadoComponent } from './home-convidado.component';

describe('HomeConvidadoComponent', () => {
  let component: HomeConvidadoComponent;
  let fixture: ComponentFixture<HomeConvidadoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [HomeConvidadoComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(HomeConvidadoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
