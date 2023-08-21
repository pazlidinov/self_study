from django.urls import path
from . import views

app_name = 'todo_app'


urlpatterns = [
    #for user
    path('users/', views.UserList.as_view(), name='user_list'),
    path('user/<int:pk>/', views.UserDetail.as_view(), name='user_detail'),
    
    #for posts
    path('', views.ListTodo.as_view(), name='todo_list'),
    path('<int:pk>/', views.DetailTodo.as_view(), name='todo_detail'),
]
