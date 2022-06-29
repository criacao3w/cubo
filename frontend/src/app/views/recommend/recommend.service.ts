import { Injectable } from '@angular/core';
import {ToastrService} from "ngx-toastr";
import {HttpClient} from "@angular/common/http";

import {Recommend} from "./recommend.model";
import {Observable} from "rxjs";


@Injectable({
  providedIn: 'root'
})
export class RecommendService {

  baseURL: string = "http://localhost:8000";

  constructor(
      private toastr: ToastrService,
      private http: HttpClient
  ) { }

  create(recommend: Recommend): Observable<Recommend> {
    return this.http.post<Recommend>(this.baseURL + '/recommend/save', recommend);
  }

  showSuccess(msg: string, title: string) {
    this.toastr.success(msg, title);
  }

  showError(msg: string, title: string) {
    this.toastr.error(msg, title);
  }

  showInfo(msg: string, title: string) {
    this.toastr.info(msg, title);
  }

  showWarning(msg: string, title: string) {
    this.toastr.warning(msg, title);
  }
}
