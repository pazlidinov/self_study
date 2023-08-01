from django.urls import path
from . import views

app_name='accounts'

urlpatterns = [
    path('login/', views.loggin, name='login'),
    path('logout/', views.loggout, name='logout'),
]
