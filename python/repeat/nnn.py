# data type
# int 
# float
# str
# bool
# list
# dict
# tuple
# set
# frozenset
# complex
# None
# a=2
# b=4
# if  a>b:
#     print('ok')
# elif a<b:
#     print('no')
# else:
#     print('hato')

# print('ok') if a>b else print('no')
# print(('ok', 'no')[a<b])

# for i in range(5):
#     print('ok')
# else:
#     print('no')


# [print('ok') for i in range(5) for j in range(5) if j>3]
# i=0
# while i<5:
#     print('ok')
#     i+=1

# print('omadli') if "13" in input() else print('omadsiz')


# max([len(i)  for i in input().split('1')])



# a_dictionary ={
#     'aaag':123113,
#     'bbb':101,
# }
# for k in a_dictionary.keys():
#     if not k.digit():
#         print(a_dictionary[k])
# [print(a_dictionary[k]) for k in a_dictionary.keys() if not k.isalpha()]


# for k, v in a_dictionary.items():
#   if '13' in str(v):
#       print(k)

# [print(k,v) for k,v in a_dictionary.items() if len(k)>sum(map(int, str(v)))]

# for k,v in a_dictionary.items():
#     count =0
#     for i in str(v):
#         count +=int(i)
        
#     if len(k)>=count:
#         print(k,v)

# n=int(input('n...'))
# a=1
# b=1
# c=0
# for i in range(3,n+1):
#     c=a+b
#     a=b
#     b=c
# print(c)
    


# a=int(input('a>>>'))
# b=int(input('b>>>'))
# while a<=b:
#     b=b/a    
    
# if b==1:
#     print('ha')
# else:
#     print('yoq')

# n-son
# c-daraja
# dict={
#     '1':n,
#     '2':n*2,
    
# }

# 3
# 4
# dict={
#     '1':3,
#     '2':9,
#     '3':27,
#     '4':81
# }


# n=int(input('n>>>'))
# c=int(input('c>>>'))
# a_dict={}
# for i in range(1, c+1):
#     a_dict[str(i)]=n**i
# print(a_dict)


a_dic={
    'a':2,
    'a':4
}
print(a_dic)