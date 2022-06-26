import {NgModule} from '@angular/core';
import {Routes, RouterModule} from '@angular/router';

import {HomeComponent} from "./views/home/home.component";
import {ProductComponent} from "./views/product/product.component";
import {RecommendComponent} from "./views/recommend/recommend.component";


const routes: Routes = [
    {
        path: "",
        component: HomeComponent
    }, {
        path: "produtos",
        component: ProductComponent
    }, {
        path: "recomendacoes",
        component: RecommendComponent
    }
];

@NgModule({
    imports: [RouterModule.forRoot(routes)],
    exports: [RouterModule]
})
export class AppRoutingModule {
}
