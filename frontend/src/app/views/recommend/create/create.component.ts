import { Component, OnInit } from '@angular/core';
import { Router } from "@angular/router";
import { ToastrService } from 'ngx-toastr';

@Component({
  selector: 'app-create',
  templateUrl: './create.component.html',
  styleUrls: ['./create.component.css']
})
export class CreateComponent implements OnInit {

  constructor(private router: Router, private toastr: ToastrService) { }

  showSuccess() {
    this.toastr.success('Sucesso!', 'Toastr fun!');
  }

  showError() {
    this.toastr.error('Erro!', 'Toastr fun!');
  }

  showInfo() {
    this.toastr.info('Info!', 'Toastr fun!');
  }

  showWarning() {
    this.toastr.warning('Warning!', 'Toastr fun!');
  }

  ngOnInit(): void {
    this.showWarning();
  }
}
