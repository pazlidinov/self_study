from django.urls import path

from . import views

app_name = 'main'

urlpatterns = [
    path('', views.homepage, name='home'),
    path('detail/<slug:article_slug>', views.detailpage, name='detail'),
    path('category/<slug:category_slug>', views.categorypage, name='cat_list'),
    path('delete/<int:comment_id>', views.deletepage, name='delete'),
    
]
