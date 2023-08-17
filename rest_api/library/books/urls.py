from django.urls import path
from . import views

app_name = 'books'

urlpatterns = [
    path('book_list/', views.BookListView.as_view(), name='todo_list'),
    path('book_detail/<int:pk>/', views.BookDetailView.as_view(), name='todo_detail'),
]
