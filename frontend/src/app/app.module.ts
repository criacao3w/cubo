import {BrowserModule} from '@angular/platform-browser';
import {NgModule} from '@angular/core';

import {AppRoutingModule} from './app-routing.module';
import {AppComponent} from './app.component';
import {BrowserAnimationsModule} from '@angular/platform-browser/animations';
import {HeaderComponent} from './component/template/header/header.component';
import {FooterComponent} from './component/template/footer/footer.component';
import {HomeComponent} from './views/home/home.component';
import {ProductComponent} from './views/product/product.component';
import {RecommendComponent} from './views/recommend/recommend.component';
import {ListComponent} from './views/recommend/list/list.component';
import {CreateComponent} from './views/recommend/create/create.component';
import {ToastrModule} from 'ngx-toastr';

@NgModule({
    declarations: [
        AppComponent,
        HeaderComponent,
        FooterComponent,
        HomeComponent,
        ProductComponent,
        RecommendComponent,
        ListComponent,
        CreateComponent
    ],
    imports: [
        BrowserModule,
        AppRoutingModule,
        BrowserAnimationsModule,
        ToastrModule.forRoot(),
    ],
    providers: [],
    bootstrap: [AppComponent]
})
export class AppModule {
}
