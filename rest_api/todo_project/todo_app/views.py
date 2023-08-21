# from django.contrib.auth import get_user_model
# from rest_framework.generics import ListCreateAPIView, RetrieveDestroyAPIView
# from .models import Todo
# from .serializers import TodoSerializer, UserSerializer

# secend section
from rest_framework.viewsets import ModelViewSet
from .permissions import IsAuthorOrReadOnly
from .models import Todo
from .serializers import TodoSerializer, UserSerializer
from django.contrib.auth import get_user_model
from .permissions import IsAuthorOrReadOnly
# Create your views here.


# class ListTodo(ListCreateAPIView):
#     queryset = Todo.objects.all()
#     serializer_class = TodoSerializer


# class DetailTodo(RetrieveDestroyAPIView):
#     queryset = Todo.objects.all()
#     serializer_class = TodoSerializer


# class UserList(ListCreateAPIView):
#     queryset = get_user_model().objects.all()
#     serializer_class = UserSerializer


# class UserDetail(RetrieveDestroyAPIView):
#     queryset = get_user_model().objects.all()
#     serializer_class = UserSerializer


# second section

class PostViewSet(ModelViewSet):
    permission_classes = (IsAuthorOrReadOnly,)
    queryset = Todo.objects.all()
    serializer_class = TodoSerializer


class UserViewSet(ModelViewSet):
    queryset = get_user_model().objects.all()
    serializer_class = UserSerializer
