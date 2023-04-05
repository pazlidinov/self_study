from django.urls import path

from . import views

app_name = 'main'

urlpatterns = [
    path('', views.home_page, name='home'),
    path('category/<slug:category_slug>/', views.category_list, name='category_list'),
    path('search/', views.search_page, name='search'),
    path('detail/<slug:task_slug>/', views.detail_page, name='detail'),
]
