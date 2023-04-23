from django.urls import path

from . import views

app_name = 'players'

urlpatterns = [
    path('', views.Players_Home_View.as_view(), name='players'),
]
