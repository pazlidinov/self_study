from django.contrib.auth import get_user_model
from rest_framework.generics import ListCreateAPIView, RetrieveDestroyAPIView
from .models import Todo
from .serializers import TodoSerializer, UserSerializer

# Create your views here.


class ListTodo(ListCreateAPIView):
    queryset = Todo.objects.all()
    serializer_class = TodoSerializer


class DetailTodo(RetrieveDestroyAPIView):
    queryset = Todo.objects.all()
    serializer_class = TodoSerializer


class UserList(ListCreateAPIView):
    queryset = get_user_model().objects.all()
    serializer_class = UserSerializer


class UserDetail(RetrieveDestroyAPIView):
    queryset = get_user_model().objects.all()
    serializer_class = UserSerializer
