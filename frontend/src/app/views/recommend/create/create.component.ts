import { Component, OnInit } from '@angular/core';



import { RecommendService } from "../recommend.service";
import { Router } from "@angular/router";
import {Recommend} from "../recommend.model";

@Component({
  selector: 'app-create',
  templateUrl: './create.component.html',
  styleUrls: ['./create.component.css']
})
export class CreateComponent implements OnInit {

  recommend: Recommend = {
    id_customer: null,
    id_product: null,
    name: '',
    email: '',
    telephone: '',
    cpf: '',
    status: ''
  }

  constructor(
      private recommendService: RecommendService,
      private router: Router
  ) { }

  recommendCreate(): void {
    console.log('dlksajdklsa');
    this.recommendService.create(this.recommend).subscribe(() => {
      this.recommendService.showSuccess('Recomendação criada!!!', 'Sucesso')
      this.router.navigate(['/produtos'])
    })
  }

  cancelCreate(): void {
    // @ts-ignore
    this.router.navigate(['/produtos'])
  }

  ngOnInit(): void {
  }
}
