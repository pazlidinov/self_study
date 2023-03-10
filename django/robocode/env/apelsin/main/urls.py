from django.urls import path, include
from . import views

app_name = 'main'

urlpatterns = [
    path('', views.homePageView, name='home'),
    path('apelsins/', views.apelsinsPageView, name='apelsins'),
    path('order/', views.orderPageView, name='order'),
]
